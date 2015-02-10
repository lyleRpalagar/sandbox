import java.util.Scanner;
public class A3dot11 {

	public static void main(String[] args) {
		Scanner input = new Scanner(System.in);
		System.out.print("Enter the month (e.g 1 - 31): ");
		int month = input.nextInt();
		System.out.print("Enter the year (e.g 1 - 12): ");
		int year = input.nextInt();
		int day = 31;
		boolean isLeapYear = 
				(year % 4 == 0 && 100 != 0) || (year % 400 == 0);
		
		
				switch(month){
				case 1: System.out.print("January " + year + " had " + day + " days");
				break;
				case 2: if(isLeapYear){
							System.out.print("February " + year + " had 29 days"); 
						}
						else{
							System.out.print("February " + year + " had 28 days");
						}
				break;
				case 3: System.out.print("March " + year + " had " + day + " days");
				break;
				case 4: System.out.print("April " + year + " had " + (day - 1) + " days");
				break;
				case 5: System.out.print("May " + year + " had " + day + " days");
				break;
				case 6: System.out.print("June " + year + " had " + (day - 1) + " days");
				break;
				case 7: System.out.print("July " + year + " had " + day + " days");
				break;
				case 8: System.out.print("August " + year + " had " + day + " days");
				break;
				case 9: System.out.print("September " + year + " had " + (day - 1) + " days");
				break;
				case 10: System.out.print("October " + year + " had " + day + " days");
				break;
				case 11: System.out.print("November " + year + " had " + (day - 1) + " days");
				break;
				case 12: System.out.print("December " + year + " had " + day + " days");
				break;

				} //switch
	}

}
