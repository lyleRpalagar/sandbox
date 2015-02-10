import java.util.Scanner;

/* 1. Ask for the 4 by 4 matrix
 * 2. Put it into a variable
 * 3. Sum up the matrix by using for loop
 * 4. display the loop  */

public class A7dot2 {

	public static void main(String[] args) {
	
		double[][] a = getMatrix();
		double solve = sumMajorDiagonal(a);
		
		System.out.print("Sum of the Elements in the major diagonal is " + solve);
		
	}
	private static double sumMajorDiagonal(double[][] a) {
		// put the sum in the for loop
		// this will help add the matrices diagonally
		double sum = 0.0;
	    for(int i = 0;i<a.length;i++)
	      sum += a[i][i];
	    return sum;
	}
	private static double[][] getMatrix() {
		// create a 4 x 4 matrix
		double[][] t = new double[4][4];
		System.out.println("enter 4-by-4 matrix row by row: ");
		
		// creating a scanner to read the input
		Scanner input = new Scanner(System.in);
		
		// user inputs 2 matrices 
		for(int row = 0; row < t.length; row++){
			for (int col = 0; col < t[row].length; col++){
				t[row][col] = input.nextDouble();
			}
		}
		
		return t;
	}
}
