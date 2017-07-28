//file		23P547
//name		Matthew Sheeler
//date		4/13/2017

#include <fstream>
#include <iostream>
#include <string>
#include <iomanip>

using namespace std;

int main()
{
	//variables
	ifstream inFile;
	double price = 0.0;
	double totalPrice = 0.0;
	int counter = 0;

	//open file to be read
	inFile.open("Intermediate23.txt", ios::in);


	//confirm file is open
	if (inFile.is_open())
	{
		//loop through and read each line
		while (!inFile.eof())
		{
			inFile >> price;

			//make sure we only count things that have a value
			if (price > 0)
			{
				/*debug message
				cout << "price read is: " << price << endl;
				*/

				counter += 1;
				totalPrice = totalPrice + price;

				//reset price so we don't count the last line twice
				price = 0;
			}
		}

		//display the average price
		cout << setprecision(2) << fixed;

		/*debug messages
		cout << "Total price is $" << totalPrice << endl;
		cout << "Counter is: " << counter << endl;
		*/
		cout << "The average price is: $" << totalPrice / counter << endl << endl;

		//close the file now that we are done with it
		inFile.close();
	}

	//file did not open correctly
	else
	{

		cout << "Error: please try again." << endl << endl;
	}

	system("pause");
	return 0;
}