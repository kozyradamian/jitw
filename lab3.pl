/*
porownaj([A,B,C,D]) :-
	C==D.
porownaj1([_,_,C,C|R]).

porownaj2(L) :-
	[_,_,A,B|_]=L,
	A==B.
zamien1([A,B,C,D],X) :-
	X=[A,B,D,C].
zamien([L,R) :-
	[A,B,X,Y|C]=L,
	R=[A,B,Y,X|C].
*/
nalezy(X,[X|_]).
nalezy(X,[_|Yogon]) :-
	nalezy(X,Yogon).

dlugosc([],0).
dlugosc([_|Ogon],Dlug) :-
	dlugosc(Ogon,X),
	Dlug is X+1.

a2b([],[]).
a2b([a|Ta],[b|Tb]) :- 
   a2b(Ta,Tb).

sklej([],X,X).
sklej([X|L1],L2,[X|L3]) :-
	sklej(L1,L2,L3).

nalezy1(X,L) :-
	sklej(_,[X|_],L).

ostatni(Element, [Element]).
ostatni(Element, [_|L]):-
	ostatni(Element, L).

ostatni1(Element, [Element]).
ostatni1(Element, [_|L]):-
	sklej(_,[Element|_],[Element]).

ostatni2(Element, lista):-
	sklej(_,[Element], lista).

dodaj(X,L,[X|L]).

usun(X,[X|Reszta],Reszta).
usun(X,[Y|Ogon],[Y|Reszta]) :-
	usun(X,Ogon,Reszta).

wstaw(X,L,Duza) :-
	usun(X,Duza,L).

nalezy3(X,L) :-
	usun(X,L,_).




