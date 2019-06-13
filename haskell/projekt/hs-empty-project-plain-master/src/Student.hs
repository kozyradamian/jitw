module Student where

data Student = Student {firstName::String, lastName::String, age::Int} deriving (Show, Read, Eq)
   
--listToProcess = [Student "Alicja" "Akla" 21, Student "Batrek" "Bodo" 20, Student "Celina" "Czyzyk" 21, Student "Damian" "Dab"  --22, Student "Eustachy" "Elo" 20]
---------------------------------------------------
--foo:: Student -> String
--For (Student first last age)=
--	first ++ " " ++ last
---------------------------------------------------
--fullname :: Student -> String
--fullname (Student first last age) = first ++ " " ++ last

--showFullNames list = map fullname list
---------------------------------------------------
--enum ::	[(Int, Student)] -> Student -> [(Int, Student)]
--enum :: list@(x, xs) student = (2, student):list
--num :: [] student = [(1, student)]

--main :: IO ()
--main = do
--  putStrLn "What is your name?"
--  name <- getLine
--  putStrLn $ "Hello "++name++"!"

main::IO()
main = do
	printmenu []
	choice <- getLine
  case validate choice of
         Just n  -> execute . read $ choice
         Nothing -> putStrLn "ERROR"

  menu

printmenu :: [Student] ->IO()
printmenu students = do 
	putStrLn "1. dodaj nowego studenta"
  putStrLn "2. wyświetl wszystkich studentów"
	putStrLn "3. usuń studenta o zadanym numerze albumu"
  putStrLn "4. wyświetl wszystkich studentów"
  putStrLn "5. zakończ pracę z programem)"































