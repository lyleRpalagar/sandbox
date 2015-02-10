import java.util.Scanner;


public class A5dot8 {
	public static void main(String[] args) {
		// TODO Auto-generated method stub
        double celsius = 40.0;
        double fahrenheit = 120.0;
        
        // Display Format Header
		System.out.print("Celsius     Fahrenheit     |      Fahrenheit      Celsius");
		System.out.println("\n---------------------------------------------------------");
		
		for(double c = 40.0, f = 120.00; c > 30.0; c--, f--){
			double conversionToF = celsiusToFahrenheit(fahrenheit, c);
			double conversionToC = fahrenheitToCelsius(celsius, f);
			System.out.printf(c + "          " + "%.2f", conversionToF);
			System.out.printf("         |      " + f + "          " + "%.2f%n", conversionToC	);
		}
	}
	
	public static double celsiusToFahrenheit(double fahrenheit, double c){
		double conversionTofahrenheit = (9.0 / 5 * c + 32); 
		return conversionTofahrenheit;
	}
	
	public static double fahrenheitToCelsius(double celsius, double f){
		double conversionTocelsius = (5.0 / 9) * (f - 32);
		return conversionTocelsius;
	}
	

}
