sklej([],X,X).
sklej([X|L1],L2,[X|L3]) :-
	sklej(L1,L2,L3).

usun3ostatnie(L,L1) :-
	sklej(L1,[_,_,_],L).

usun3pierwsze(L,L1) :-
	sklej([_,_,_],L1,L).

usun33(L,L2) :-
	usun3pierwsze(L,L1),
	usun3ostatnie(L1,L2).

usunPierwszy(L,L1) :-
	sklej([_],L1,L).
	
usunOstatni(L,L1) :-
	sklej(L1,[_],L).



parzysta([]).
parzysta([_|X]):-
	nieparzysta(X).
nieparzysta([_|X]):-
	parzysta(X).

odwroc([],[]).
odwroc([H|T],L) :-
	odwroc(T,R),
	sklej(R,[H],L).

palindrom(L) :-
	odwroc(L,L).

przesun([First|Tail],Result) :-
	sklej(Tail,[First],Result).

dodaj(X,L,[X|L]).

znaczy(0,zero).   
znaczy(1,jeden).
znaczy(2,dwa).    
znaczy(3,trzy).
znaczy(4,cztery).
znaczy(5,piec).
znaczy(6,szesc).  
znaczy(7,siedem).
znaczy(8,osiem).  
znaczy(9,dziewiec).

przeloz([],[]).
przeloz([A|Reszta],L2) :-
	znaczy(A,B),
	przeloz(Reszta,L3),
	dodaj(B,L3,L2).


podzbior([], []).

podzbior(L,Z) :- 
	L=[_|Reszta],
	podzbior(Reszta,Z).
	
podzbior(L,Z) :- 
	L=[H|Reszta1],Z=[H|Reszta2],
	podzbior(Reszta1,Reszta2).



permutacja([],[]).
permutacja([X|L],P) :-
	permutacja(L,L1),
	wstaw(X,L1,P).
 
dlugosc([],0).

dlugosc([_|Ogon],Dlug) :-
	dlugosc(Ogon,X),
	Dlug is X+1.
/**
podziel(L,L1,L2):-
	sklej(L1,L2,L),
	dlugosc(L1,D),
	dlugosc(L2,D).

podziel(L,L1,L2):-
	sklej(L1,L2,L),
	dlugosc(L1,D),
	dlugosc(L2,D).
podziel(L,L1,L2):-
	sklej(L1,L2,L),
	dlugosc(L1,D),
	dlugosc(L2,D),
	X is D-1.
**/
podziel([H], [H], []).
podziel([], [], []).
podziel([H1,H2|L1],[H1|L2],[H2|L3]:-
	podziel(L1,L2,L3).	





