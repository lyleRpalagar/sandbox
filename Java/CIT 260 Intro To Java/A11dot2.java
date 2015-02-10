
public class A11dot2 {

	/* This Assignment practices inheritance of classes
	 *  Person 
	 *  Student  Employee
	 *            Faculty    Staff
	 *            
	 *Staff inherited everything Employee has plus title
	 * Faculty inherited everything Employee has plus hours and rank
	 * Student and Employee has everything Person has plus their individual variables
	 * 
	 * everything refers to variables */
	
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Person p = new Person("Bob Jones", "Idaho", "111-1111", "bob@gmail.com");
		Student s = new Student("Joe Jones", "Utah", "222-2222", "joe@gmail.com", 3);
		Employee e = new Employee("Frank Jones", "Texas", "333-3333", "frank@gmail.com", 
				                  "Smith 111", 50000, new MyDate(1999, 5, 8));
		Faculty f = new Faculty("Ann Jones", "Wyoming", "444-4444", "ann@gmail.com", 
                "Smith 222", 50000, new MyDate(2010, 8, 1), "10:00", 2);
		Staff t = new Staff("Stephanie Jones", "California", "555-5555", "steph@gmail.com", 
                "Smith 333", 50000, new MyDate(2011, 9, 1), "Administrator");
		
		
		System.out.println(p);
		System.out.println(s);
		System.out.println(e);
		System.out.println(f);
		System.out.println(t);
	}
}

class Person{
	protected String name;
	protected String address;
	protected String phoneNumber;
	protected String email;

	Person(){
	
	}
	
	Person(String name, String address, String phoneNumber, String email){
		// refers to protected String name on line 11;
		this.name = name;
		this.address = address;
		this.phoneNumber = phoneNumber;
		this.email = email;	
	}
	
	// method toString is used if we want to print an object
	public String toString(){
		return "Person - " + name + "   " + address;
	}
}


// Student will gain inheritance of all variables from Person.
// when calling super class the super class would look for the person arg constructor
class Student extends Person{
	  protected int status;
      
	  // no arg constructor
	  Student(){
	 
	  }
	  
	  // arg constructor
	  Student(String name, String address, String phoneNumber, String email, int status){
		  // looks into the super class for its constructor ( Person (String ... ... ) ) 
		  // this is inheritance
		  super(name, address, phoneNumber, email);
		  this.status = status;
	  }
	  
	  public String toString(){
			return "Student - " + name + "   " + address;
		}
}

class Employee extends Person{
	  protected String office;
	  protected int salary;
	  protected MyDate dateHired;
    
	  // no arg constructor
	  Employee(){
	 
	  }
	  
	  // arg constructor
	  Employee(String name, String address, String phoneNumber, String email, String office, int salary, MyDate dateHired){
		  // looks into the super class for its constructor ( Person (String ... ... ) ) 
		  // this is inheritance
		  super(name, address, phoneNumber, email);
		  this.office = office;
		  this.salary = salary;
		  this.dateHired = dateHired;
	  }
	  
	  public String toString(){
			return "Employee - " + name + "   " + address;
		}
}

class MyDate{
   int year;
   int month;
   int day;
   
   
   MyDate(){   
   }
   
   MyDate(int year, int month, int day){
     this.year = year;
     this.month = month;
     this.day = day;
   }
  
}

class Faculty extends Employee{
	  protected String officeHours;
	  protected int rank;
  
	  // no arg constructor
	  Faculty(){
	 
	  }
	  
	  // arg constructor
	  Faculty(String name, String address, String phoneNumber, String email, String office, int salary, MyDate dateHired, String officeHours, int rank){
		  // looks into the super class for its constructor ( Person (String ... ... ) ) 
		  // this is inheritance
		  super(name, address, phoneNumber, email, office, salary, dateHired);
		  	this.officeHours = officeHours;
		  	this.rank = rank;
	  }
	  
	  public String toString(){
			return "Faculty - " + name + "   " + address;
		}
}

class Staff extends Employee{
	  protected String title;

	  // no arg constructor
	  Staff(){
	 
	  }
	  
	  // arg constructor
	  Staff(String name, String address, String phoneNumber, String email, String office, int salary, 
			MyDate dateHired, String title){
		  
		  // looks into the super class for its constructor ( Person (String ... ... ) ) 
		  // this is inheritance
		  super(name, address, phoneNumber, email, office, salary, dateHired);
		  	this.title = title;
	  }
	  
	  public String toString(){
			return "Staff - " + name + "   " + address;
		}
}