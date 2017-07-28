// file:	33P421
// name:	Matthew Sheeler
// date:	2/21/2017

#include <iostream>
using namespace std;

int main()
{
	//variables
	int minimumOrder[4] = { 1, 11, 51, 101 };
	int maximumOrder[4] = { 10, 50, 100, 99999 };
	int shippingCharge[4] = { 15, 10, 5, 0 };
	int numberItemsOrdered = 0;
	int i = 0;

	//prime order read
	cout << "Enter the total number of items ordered (enter -1 to stop): ";
	cin >> numberItemsOrdered;

	//keep entering orders until we get a negative number
	while (numberItemsOrdered >= 0)
	{

		//check to make sure we have a valid input for number of items ordered
		while (numberItemsOrdered == 0 || numberItemsOrdered > 99999)
		{			
			if (numberItemsOrdered == 0)
			{
				system("cls");
				cout << "Error: You must have at least 1 item ordered, please enter 1 or more: ";
				cin >> numberItemsOrdered;
			}
			if (numberItemsOrdered > 99999)
			{
				system("cls");
				cout << "Error: Cannot have more than 99999 item ordered, please enter 99999 or less: ";
				cin >> numberItemsOrdered;
			}
			if (numberItemsOrdered < 0)
			{
				return 0;
			}
		}
		
		//loop through to calculate shipping charge and display it
		for (i = 0; i < 4; i++)
		{
			if (numberItemsOrdered >= minimumOrder[i] && numberItemsOrdered <= maximumOrder[i])
			{
				cout << endl << endl << "Shipping Charge: " << shippingCharge[i] << endl << endl;
			}
		}
		
		system("pause");
		system("cls");

		//enter next order
		cout << "Enter the total number of items ordered (enter -1 to stop): ";
		cin >> numberItemsOrdered;
	}
	return 0;
}