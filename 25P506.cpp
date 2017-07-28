// file:	25P506
// name:	Matthew Sheeler
// date:	4/4/2017

#include <string>
#include <iostream>
#include <algorithm>

using namespace std;

int main()
{
	//declare variables
	string word = "";
	
	//get input
	cout << "Please enter any word or string of characters: ";
	getline(cin, word);

	//check to make sure we have a string long enough to reverse (ie greater than 1 character)
	while (word.length() < 2)
	{
		system("cls");
		cout << "Error: Please enter a word with two or more characters: ";
		getline(cin, word);
	}

	//send output to user
	system("cls");
	cout << word << " in reverse is: ";

	//looping through, grabbing last character first and working back to first character.
	for (int i = word.length() -1 ; i > -1 ; --i)
	{
		cout << word.substr(i, 1);
	}

	cout << endl << endl;
	system("pause");
	return 0;
}
