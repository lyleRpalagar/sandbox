import java.util.Scanner;

public class A5dot7 {

	public static void main(String[] args) {
		// Create a New Scanner
		// Read output ( invested and interest rate)
		// convert interest rate
		// Get output and create new variables
		// convert future value  put in loop 
		// return output 
		
		Scanner input = new Scanner(System.in);
		System.out.print("The amount invested: ");
			double investment = input.nextDouble();
			
		System.out.print("Annual interest rate: ");
			double annualInterest = input.nextDouble();
			double monthlyRate = annualInterest / 1200;
		
		
		System.out.print("Years     Future Value");
		System.out.println("\n---------------------");
			
			int max = 30;
				for(int i = 1; i <= max; i++){
					double futureValue = futureInvestmentValue(investment, monthlyRate, i);
					System.out.printf(i + "           " +"$%2.2f%n",futureValue);
				}
	}
	
public static double futureInvestmentValue(double investmentAmount,
			double monthlyInterestRate,int years){
				double x = investmentAmount * Math.pow(( 1 + monthlyInterestRate), years * 12);
				return x;
	
			}

}	
