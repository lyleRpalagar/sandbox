
public class A8dot7 {

	public static void main(String[] args) {
/* This Assignment will call Account.java */

/* -- account 1 -- */		
		// Call account to create an account user from Account.java. 1122 is id; 2000.00 is balance
		Account acc = new Account(1122, 20000.00);
		// Since we can not call private variable's we will have to call the mutator's  instead 
		acc.setAnnualInterestRate(.045);
		acc.withdraw(2500.00);
		acc.deposit(3000.00);
		System.out.println("Account Id = " + acc.getId());
		System.out.printf("Balance = %5.2f%n", acc.getBalance());
		System.out.printf("Monthly Interest = %5.2f%n", acc.getMonthlyInterest());
		System.out.println("Date Created = " + acc.getDateCreated());
		
		System.out.println();
		System.out.println(" ------------------------------------------------------------------ ");
		System.out.println();
		
/* -- account 2 -- */	
		Account acc1 = new Account(1123, 200000.00);
		// Since we can not call private variable's we will have to call the mutator's  instead 
		acc1.setAnnualInterestRate(.045);
		acc1.withdraw(2500.00);
		acc1.deposit(30000.00);
		System.out.println("Account Id = " + acc1.getId());
		System.out.printf("Balance = %5.2f%n", acc1.getBalance());
		System.out.printf("Monthly Interest = %5.2f%n", acc1.getMonthlyInterest());
		System.out.println("Date Created = " + acc1.getDateCreated());
		
		System.out.println();
		System.out.println(" ------------------------------------------------------------------ ");
		System.out.println();
	}

}
