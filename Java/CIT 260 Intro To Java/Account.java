import java.util.Date;


public class Account {
	private int id = 0;
	private double balance = 0.0;
	private double annualInterestRate = 0.0;
	private Date dateCreated;
	
/* creates a no-arg that creates a default account*/
	Account(){
		dateCreated = new Date();
	}
	
/* create a constructor that creates an account
	 with the specified id and initial balance.*/

	Account(int newId, double newBalance){
		// store new id value into the original id (found in line 5) 
		id = newId; 
		// stores new balance value into the original id (found in line 6)
		balance = newBalance;
		dateCreated = new Date();
	}
	
/* Create an accessor and mutator methods */

/* -- ID -- */
	// Accessor lets us access a field ,from a private variable else where
	public int getId(){
		return id;
	}
	// Mutator change values 
	public void setId(int newId){
		id = newId;
	}

/* -- Balance -- */	
	// Accessor lets us access a field ,from a private variable else where
	public double getBalance(){
		return balance;
	}
	// Mutator change values 
	public void setBalance(double newBalance){
		balance = newBalance;
	}

/* -- AnnualInterestRate -- */
	// Accessor lets us access a field ,from a private variable else where
	public double getAnnualInterestRate(){
		return annualInterestRate;
	}
	// Mutator change values 
	public void setAnnualInterestRate(double newAnnualInterestRate){
		annualInterestRate = newAnnualInterestRate;
	}

/* -- GetDateCreated -- */
	// Accessor , but no Mutator for date object because we do not want people to change the date
    public Date getDateCreated(){
    	return dateCreated;
    }
	
/* method name that returns the monthly interest rate */
    public double getMonthlyInterestRate(){
    	return annualInterestRate / 12.0;
    }

/* method name getMonthlyInterest() that returns the monthly interest */    
    public double getMonthlyInterest(){
    	return balance * getMonthlyInterestRate();
    }
    
/* method name withdraw that withdraws a specified amount from the account */
    public void withdraw(double amount){
    	// if stmt to see if the user tries to pull out more money from what they currently have.
    	if (balance >= amount){
    		balance -= amount;
    	} else{
    		System.out.println("insufficient funds.");
    	}
    }
   
/* method name deposit that deposits a specified amount to the account */
    public void deposit(double amount){
    	balance += amount;
    }
}
