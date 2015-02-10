import java.util.Scanner;

public class A6dot8 {

	public static void main(String[] args) {
       double[] user = new double[10];
       

		//grabs the users input and put it in the array
       Scanner input = new Scanner(System.in);
       System.out.print("Enter ten numbers: ");
       for(int i = 0; i < user.length; i++){
    	   user[i] = input.nextDouble();
       }
       
        System.out.println("The total number is: " + average(user) );
	}
	
	public static int average(int[] user){
		// total the users array and find the array
	    int total = 0;
        for(int i = 0; i < user.length; i++){
        	total+= user[i] / user.length;
        }
		return total;
	}
	
	
	public static double average(double[] user){
		// total the users array and find the array
		double total = 0.0;
    	for(int i = 0; i < user.length; i++){
    		total+= user[i] / user.length;
    	}
	    
	    return total;
	}
}
