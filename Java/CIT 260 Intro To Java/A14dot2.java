import java.util.InputMismatchException;
import java.util.Scanner;


public class A14dot2 {

	public static void main(String[] args) {	
		int int1 = 0;
		int int2 = 0;
		
		int newInt1 = getInt1(int1);
		int newInt2 = getInt2(int2);
	
		int solution = newInt1 + newInt2;
		
		System.out.println("The sum of " + newInt1 + " and " + newInt2 + 
				          " is " + solution);
		  
	}

	private static int getInt1(int int1) {
		 Scanner input = new Scanner(System.in);
		  int newInt1;
		try{
			  System.out.print("Please input an integer: ");
			  newInt1 = input.nextInt();
			  
		  }
		    catch(InputMismatchException exception){
		    	System.out.println();
		    	System.out.println("** This is not an integar! (use ex: 1 - 100) **");
		    	System.out.println();
		    	newInt1 = getInt1(int1);
		    }
		return newInt1;
	}
	
	private static int getInt2(int int2) {
		 Scanner input = new Scanner(System.in);
		  int newInt2;
		try{
			  System.out.print("Please input another integer: ");
			  newInt2 = input.nextInt();
			  
		  }
		    catch(InputMismatchException exception){
		    	System.out.println();
		    	System.out.println("** This is not an integar! (use ex: 1 - 100) **");
		    	System.out.println();
		    	newInt2 = getInt2(int2);
		    }
		return newInt2;
	}


}
	

	