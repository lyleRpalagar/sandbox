// C# Example of encapsulation 
using System; 

//  each object are privately held inside a defined boundary, or class. Other objects do not have access to this class variables and must be set using the specific classes methods.

public class Encap { 
	
	// private variables declared 
	// these can only be accessed by 
	// public methods of class 
	private String carName; 
	private String carModel; 
	
	// Only way to access 
	// the studentName variable
	public String Name { 
		
		get { 
			return carName;	 
		} 
		
		set { 
			carName = value; 
		} 
		
	} 
	
	// Only way to access the Age 
	public String Model { 
		
		get { 
			return carModel;	 
		} 
		
		set { 
			carModel = value; 
		} 
		
	} 

	
} 

// Driver Class 
public class RandomClassTwo { 
	
	// Main Method 
	static public void Main() { 
		
		// creating object 
		Encap obj = new Encap(); 

		// calls the property Name, 
		// and pass "Corrolla" which will be passed in the Set
		obj.Name = "Corrollas"; 
		
		// calls the property Model, 
		// and pass "Toyotoa" which will be passed in the Set
		obj.Model = "Toyotoa"; 

		// Displaying values of the variables 
		Console.WriteLine("Name: " + obj.Name); 
		Console.WriteLine("Model: " + obj.Model); 
	} 
} 

