import mysql.connector as sql
import spacy 
import numpy as np

nlp = spacy.load('en_core_web_md') # <------- Machine Learning Model ------->
token = lambda word: nlp(word)[0]

db_connection = sql.connect(
  host="localhost",
  user="root",
  password="",
  database="tharind2_movie_db"
) 
db_cursor = db_connection.cursor()

def KeyWordAnalysis(keyword):
	keywordScores = {}

	db_cursor.execute('SELECT keywordID,keywordName FROM keyword_tb')
	table_rows = db_cursor.fetchall()

	for item in table_rows:
		longKeyword = item[1].find(' ')
		if(longKeyword < 0):
			score = token(item[1]).similarity(token(keyword))
			keywordScores[item[0]] = score

	sorted_dict = dict(sorted(keywordScores.items(),key=lambda item: item[1],reverse=False))

	neww = dict(list(sorted_dict.items())[len(sorted_dict)//2:])
	arr = np.asarray(list(neww.keys()))
	SplitedArray=np.array_split(arr, 10)

	New = []
	for x in range(6,len(SplitedArray)):
		New.append(SplitedArray[x])
	SplitedArray = New

	movieKeywordAll = {}
	for lenConut in range(len(SplitedArray)):
		movieKeyword = {}
		for x,item in enumerate(SplitedArray[lenConut]):
			db_cursor.execute("SELECT DISTINCT `movie_tb_movieID` FROM `keywordconnection_tb` WHERE keyWord_tb_keywordID='" + item + "';")
			table_rows = db_cursor.fetchall()
			for x in range(len(table_rows)):
				try:
					score = movieKeyword[table_rows[x][0]]
				except:
					score = 0
				score += 1
				movieKeyword[table_rows[x][0]] = score

		for x,item in enumerate(movieKeyword):
			db_cursor.execute("SELECT COUNT(DISTINCT `keyWord_tb_keywordID`) FROM `keywordconnection_tb` WHERE `movie_tb_movieID`='"+item+"'")
			totalKeyword = db_cursor.fetchall()
			score = movieKeyword[item]
			value = score / totalKeyword[0][0]
			movieKeyword[item] = value
		movieKeywordAll[lenConut] = movieKeyword

	for x1,item in enumerate(movieKeywordAll.values()):
		for x,item2 in enumerate(item.items()):
			mutipliedValue = item2[1]*x1*100
			movieKeywordAll[x1][item2[0]] = mutipliedValue

	movieKeywordValues = {}
	for x1,item in enumerate(movieKeywordAll.values()):
		for x,item2 in enumerate(item.items()):
			try:
				score = movieKeywordValues[item2[0]]
			except:
				score = 0
			score +=item2[1]
			movieKeywordValues[item2[0]] = score

	sorted_dict_movieKeywordValues = dict(sorted(movieKeywordValues.items(),key=lambda item: item[1],reverse=False))
	print(sorted_dict_movieKeywordValues)
	print(len(sorted_dict_movieKeywordValues))

print("Running...")
KeyWordAnalysis("Dangerous")

