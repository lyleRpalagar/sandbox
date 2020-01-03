using System;

// Polymorphism provides the ability to a class to have multiple implementations with the same name.
public class Polymorphism {  
	// Method name Thing that is an int.
    public int Thing(int a, int b, int c) {  
        return a + b + c;  
    }  
	
	// Method name Thing that is a string.
    public string Thing(string a, string b) {  
        return a + b;  
    }  
}  
public class Program {  
    
	public static void Main(string[] args) {  
        Polymorphism dataClass = new Polymorphism();  
		// Calling method name thing with 3 int values.
        int thing1 = dataClass.Thing(1, 2, 3);  
		// Calling method name thing with 2 string values.
        string thing2 = dataClass.Thing("Hello ", "World"); 

		Console.WriteLine(thing1);
		Console.WriteLine(thing2);
    }  
}  
