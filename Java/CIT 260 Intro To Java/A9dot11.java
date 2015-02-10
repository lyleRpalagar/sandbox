import java.util.Scanner;
import java.util.Arrays; 


public class A9dot11 {

	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);
		System.out.print("Please input a string: ");
		// reads the users input
		String s = input.next();
		
		System.out.println("Sorting Alphabetically: \n" + sort(s) );
		

	}

	public static String sort(String s) {
		// Converts string to character array
		char [] arr = s.toCharArray();
		// Sorts the char arr 
		Arrays.sort(arr);
		// Create a new string object passing the char array.
		String argu = new String(arr);
		return argu;
	}

}
