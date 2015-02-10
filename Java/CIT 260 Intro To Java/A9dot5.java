import java.util.Scanner; 

public class A9dot5 {

	public static void main(String[] args){
		Scanner input = new Scanner(System.in);
		System.out.print("Please input a String: ");
		String s = input.nextLine();
		// invokes the countLetter method to count each letter
		int[]count = count(s.toLowerCase());
		int num = 0;
		
		
		// Display the results
		for(int i = 0; i < count.length; i++){

				System.out.println( num++ + " appears " + 
			 count[i] + ((count[i] == 1)? " time" : " times"));
		}
	 /* for(int num : count){
		  System.out.printf((num != 1 )? "%d - %d's%n" : "%d - %d%n", num, i);
		  i++;
	  }*/
		
		
		
		
	}

	public static int[] count(String s) {
		int[] counts = new int[10];
		int num = 0;
		for(char arr : s.toCharArray()){
		    num = Character.getNumericValue(arr);
		
		  if (num >= 0 && num <= 9){
			  counts[num] += 1;
		  }
		}
		return counts;
	} 
} 


