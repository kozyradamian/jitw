module Tree where
data Tree a 
          = Branch a (Tree a) (Tree a)
           | Leaf
