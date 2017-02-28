
$(function() {
  var listOfClasses = [
    "ActionScript",
    "AppleScript",
    "Asp",
    "BASIC",
    "C",
    "C++",
    "Clojure",
    "COBOL",
    "ColdFusion",
    "Erlang",
    "Fortran",
    "Groovy",
    "Haskell",
    "Java",
    "JavaScript",
    "Lisp",
    "Perl",
    "PHP",
    "Python",
    "Ruby",
    "Scala",
    "Scheme"
  ];
$( "#class1" ).autocomplete({
  source: listOfClasses
});
$( "#class2" ).autocomplete({
  source: listOfClasses
});
$( "#class3" ).autocomplete({
  source: listOfClasses
});
$( "#class4" ).autocomplete({
  source: listOfClasses
});
$( "#class5" ).autocomplete({
  source: listOfClasses
});
$( "#class6" ).autocomplete({
  source: listOfClasses
});

} );
