import mysql.connector as sql
import pandas as pd
import numpy as np


db_connection = sql.connect(
  host="localhost",
  user="root",
  password="",
  database="tharind2_movie_db"
) 
db_cursor = db_connection.cursor()

def GeneresAnalysis(genresName):
	list_genresScores=[]
	for genresName in genresName:
		# print(genresName , "------------------------")
		genresScores = {}
		
		db_cursor.execute("SELECT genresID FROM genres_tb WHERE genresName='" + genresName + "';")
		table_rows = db_cursor.fetchall()
		genresID = table_rows[0][0]
		#print(genresID)

		db_cursor.execute("SELECT COUNT(genres_tb_genresID) FROM genresmovieconnection_tb WHERE genres_tb_genresID='" + genresID + "';")
		table_rows = db_cursor.fetchall()
		#print(table_rows[0][0])

		db_cursor.execute("SELECT movie_tb_movieID FROM genresmovieconnection_tb WHERE genres_tb_genresID='" + genresID + "';")
		table_rows = db_cursor.fetchall()
		
		for movie in table_rows:
			db_cursor.execute("SELECT COUNT(movie_tb_movieID) FROM genresmovieconnection_tb WHERE movie_tb_movieID='" + movie[0] + "';")
			table_rows = db_cursor.fetchall()
			# for item in genresScores.items():
			# 	try:
			# 		likeCount = genresScores[movie[0]]
			# 	except:
			# 		likeCount =0
			likeCount=1/table_rows[0][0]
			genresScores[movie[0]]=likeCount

		list_genresScores.append(genresScores)
		print(list_genresScores)
	

		









		# sorted_dict = dict(sorted(keywordScores.items(),key=lambda item: item[1],reverse=False))

		# neww = dict(list(sorted_dict.items())[len(sorted_dict)//2:])
		# arr = np.asarray(list(neww.keys()))
		# SplitedArray=np.array_split(arr, 10)

		# New = []
		# for x in range(7,len(SplitedArray)):
		# 	New.append(SplitedArray[x])
		# SplitedArray = New

		# movieKeywordAll = {}
		# for lenConut in range(len(SplitedArray)):
		# 	movieKeyword = {}
		# 	for x,item in enumerate(SplitedArray[lenConut]):
		# 		db_cursor.execute("SELECT DISTINCT `movie_tb_movieID` FROM `keywordconnection_tb` WHERE keyWord_tb_keywordID='" + item + "';")
		# 		table_rows = db_cursor.fetchall()
		# 		for x in range(len(table_rows)):
		# 			try:
		# 				score = movieKeyword[table_rows[x][0]]
		# 			except:
		# 				score = 0
		# 			score += 1
		# 			movieKeyword[table_rows[x][0]] = score

		# 	for x,item in enumerate(movieKeyword):
		# 		db_cursor.execute("SELECT COUNT(DISTINCT `keyWord_tb_keywordID`) FROM `keywordconnection_tb` WHERE `movie_tb_movieID`='"+item+"'")
		# 		totalKeyword = db_cursor.fetchall()
		# 		score = movieKeyword[item]
		# 		value = score / totalKeyword[0][0]
		# 		movieKeyword[item] = value
		# 	movieKeywordAll[lenConut] = movieKeyword

		# for x1,item in enumerate(movieKeywordAll.values()):
		# 	for x,item2 in enumerate(item.items()):
		# 		mutipliedValue = item2[1]*x1*100
		# 		movieKeywordAll[x1][item2[0]] = mutipliedValue

		# movieKeywordValues = {}
		# for x1,item in enumerate(movieKeywordAll.values()):
		# 	for x,item2 in enumerate(item.items()):
		# 		try:
		# 			score = movieKeywordValues[item2[0]]
		# 		except:
		# 			score = 0
		# 		score +=item2[1]
		# 		movieKeywordValues[item2[0]] = score

		# sorted_dict_movieKeywordValues = dict(sorted(movieKeywordValues.items(),key=lambda item: item[1],reverse=False))
		# print(sorted_dict_movieKeywordValues)
		# print(len(sorted_dict_movieKeywordValues))

print("Running...")
GeneresAnalysis(['Comedy','Crime','Sci-Fi'])

