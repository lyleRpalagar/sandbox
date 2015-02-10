public class A4dot3 {

	public static void main(String[] args) {
		
		//Display the number title
		System.out.print("Kilograms     Pounds");
		System.out.println("\n---------------------");
		
		//Display table body
	   double p = 2.2;
	   
	   for(int k = 1; k <= 200; k += 2  ){
		   System.out.println(k + "            " + k * p);
	   }
	   
	} // main
} // class





/*	//Display the table heading
System.out.println("           Multiplication Table");

//Display the number title
System.out.print("   ");
for (int j = 1; j <= 9; j++){
	System.out.print("   " + j);
}
System.out.println("\n-----------------------------------------");

//Display table body
for(int i = 1; i <= 9; i++){
	System.out.print(i + " | ");
	for(int j = 1; j <= 9; j++){
		//Display the product and align properly
		System.out.printf("%4d", i * j);
	}
	System.out.println();
} */



/*	Scanner input = new Scanner(System.in);
System.out.print("Put a kilagrams to be converted for pounds: ");
double kilo = input.nextDouble();

double pounds = kilo * 2.2;

System.out.print(kilo + " converted into pounds is " + pounds +" pounds.");
*/