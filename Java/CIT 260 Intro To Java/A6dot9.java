import java.util.Scanner;

public class A6dot9 {

	public static void main(String[] args) {
		double[] user = new double[10];
		
		// grabs the users input and put it in the array
		Scanner input = new Scanner(System.in);
		System.out.print("Enter ten numbers: ");
		 for(int i = 0; i < user.length; i++){
			 user[i] = input.nextDouble();
		 }
		 
		 System.out.print("The minimum number is : " + min(user));
	}
	
	public static double min(double[] user){
		double min = 0.0;
		// keeps track of the position in the array
		for(int count = 0; count < user.length; count++){
			// compares the current position to the next position in an array
			for(int i = 0; i < user.length; i++){
				if(user[i] < user[count]){
				min = user[i];
				}
			}
		}
		
		return min;
	}
}
