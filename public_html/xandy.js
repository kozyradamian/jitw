/* @Note: not sure e.pageX will work in IE8 */
(function(window){
  
  /* A full compatability script from MDN: */
  var supportPageOffset = window.pageXOffset !== undefined;
  var isCSS1Compat = ((document.compatMode || "") === "CSS1Compat");
 
  /* Set up some variables  */
  var menu1 = document.getElementById("menu1");
  /* Add an event to the window.onscroll event */
  window.addEventListener("scroll", function(e) {  
    
    /* A full compatability script from MDN for gathering the x and y values of scroll: */
    var x = supportPageOffset ? window.pageXOffset : isCSS1Compat ? document.documentElement.scrollLeft : document.body.scrollLeft;
    var y = supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;
 
    menu1.style.left = -x + 50 + "px";
  });
  
})(window);;
