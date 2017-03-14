"""
Simple Translator to use user input and translate the word into pig latin
version 1.0
date: 3/13/2017
 """

# assign variable to ay
pyg = 'ay'

#grab the users input
original = input('Enter a word:')

#force the user input to be lowercase
word = original.lower()

# variable contains first letter of the input
first = word[0]

# variable concats input + firstLetter + pyg variable
new_word = word + first + pyg

# remove first letter of the word and display the rest
new_word = new_word[1:len(new_word)]

if len(word) > 0 and word.isalpha():
    print new_word
else:
    print 'Error: Enter a word with no spaces'
