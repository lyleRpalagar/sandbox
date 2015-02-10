import java.util.Scanner;
 
/*  Get the matrices from the user
 *  Sum up the matrices from the user 
 *  Print the Matrices in the formated example
 *  Pass these methods in the main(String) 
 *  */

public class A7dot5 {

		public static void main(String[] args) {
			// Gathers the methods
			double[][] a = getMatrix();
			double[][] b = getMatrix();
			
			double[][] c = sumMatrices(a,b);
			
			printMatrices(a,b,c);
		}

		private static void printMatrices(double[][] a, double[][] b, double[][] c) {
			
			// prints the matrices 
			// System.out.print((row==1)? " + " : "   "):
			// is a conditional statement saying computer
			// print "   + " if row == 1
			// if row does not == 1 than (:) print "   "
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

		private static double[][] sumMatrices(double[][] a, double[][] b) {
			// create your array 
			double[][] c = new double[3][3];
			
			//locations in the matrices
			for(int row = 0; row < a.length; row++){
				for (int col = 0; col < a[row].length; col++){
						  c[row][col] += a[row][col] + b[row][col];

				}
				
			}
			
			
			
			return c;
		}

		private static double[][] getMatrix() {
			// create a 3 x 3 matrix
			// create a variable t that holds a 3x3 matrix
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
