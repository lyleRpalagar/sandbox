import java.util.Scanner;


public class P7dot6 {

	public static void main(String[] args) {
		
		double[][] a = getMatrix();
		double[][] b = getMatrix();
		
		double[][] c = multiplyMatrices(a,b);
		
		printMatrices(a,b,c);
	}

	private static void printMatrices(double[][] a, double[][] b, double[][] c) {
		// prints the matrices 
		//a
		for(int row = 0; row < a.length; row++){
			for (int col = 0; col < a[row].length; col++){
				 System.out.printf("%7.2f",a[row][col]);
			}

			System.out.print((row == 1)? "   + " : "     ");
			// b
			for (int col = 0; col < b[row].length; col++){
				 System.out.printf("%7.2f",b[row][col]);
			}
			System.out.print((row == 1)? "   = " : "     ");
			// c
			for (int col = 0; col < c[row].length; col++){
				 System.out.printf("%7.2f",c[row][col]);
			}
			System.out.println();
		}
	}

	private static double[][] multiplyMatrices(double[][] a, double[][] b) {
		// create your array 
		double[][] c = new double[3][3];
		
		//locations in the matrices
		for(int row = 0; row < a.length; row++){
			for (int col = 0; col < a[row].length; col++){
				// keep track of where the user is at in the matrix
				  for ( int ptr = 0; ptr < b.length; ptr++){
					  c[row][col] += a[row][ptr] * b[ptr][col];
				  }

			}
			
		}
		
		
		
		return c;
	}

	private static double[][] getMatrix() {
		// create a 3 x 3 matrix
		double[][] t = new double[3][3];
		System.out.println("enter nine doubles for a matrix: ");
		
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
