import java.util.Scanner;

public class A6dot10 {

	public static void main(String[] args) {
		int[] user = new int[10];
		
		// grabs the users input and put it in the array
		Scanner input = new Scanner(System.in);
		System.out.print("Enter ten numbers: ");
		 for(int i = 0; i < user.length; i++){
			 user[i] = input.nextInt();
		 }
		 
		 System.out.print("The minimum number can be found index: " + index(user));
	}
	
	public static int index(int[] user){ 
		// temporary variable that holds 0
		int minIndex = 0;
		
		// if the users input is greater than whats currently in the 
		// listed array than replace minIndex value with the index of 
		// the array.
		for(int index = 1; index < user.length; index++){
			if(user[minIndex] > user[index] ){
				minIndex = index;
			}	
		}
		
		
		
		return minIndex;
	}
}
