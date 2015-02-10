import java.util.Scanner;

public class A6dot11 {

	public static void main(String[] args) {
		double[] user = new double[10];
		Scanner input = new Scanner(System.in);
		System.out.print("Enter ten numbers: ");
		for(int i = 0; i < user.length; i++){
			user[i] = input.nextDouble();
		}
   
		System.out.printf("The mean is:  " + "%.2f%n" , mean(user));
		System.out.printf("The standard deviation is : " + "%.5f" , sd(user));
		
	}

	private static double sd(double[] user) {
		double standardD = 0.0;
		double mean = mean(user);
		double sum = 0.0;
		double temp = 0.0;
		
		for(double a : user){
			sum +=  Math.pow((a - mean), 2);
		}
		temp = sum /  (user.length - 1);
		standardD = Math.sqrt(temp);
		
		return standardD;
	
	}

	private static double mean(double[] user) {
		double isMean = 0.0;
		// add up all the values in the array and divide it by the 
		// number of array length
		for(double a : user){
			isMean+= a;
		}
		return isMean/user.length;
	
	}

}
