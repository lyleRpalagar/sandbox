String.prototype.capitalizingFirstLetterOfEveryWord = function () {
  return this.replace(/(?:^|\s)\S/g, function(m){ return m.toUpperCase(); });
};

// To use:  str.capitalizingFirstLetterOfEveryWord()


// explanation 
// ?: just doesn't create a capturing group
// (^..)  any character except
// \s white space
// \S anything except a white space
//  summary: the regrex grabs the beginning space and the first letter   ( ?: ) is optional its used for optimization.
