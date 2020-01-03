using System;

// Class can derived functions from another class which allows it to be extend, reuse or modified.
namespace Inheritance {

	// Base Constructor.
    public class LeagueOfLegendsCharacter {
        public string Name;
		public string Title;
        private string Location;
		// Void because this method does not return anything.
        public void GetLoLInfo(string location) {
            Location = location;
            Console.WriteLine("Name: {0}", Name);
			Console.WriteLine("Title: {0}", Title);
            Console.WriteLine("Location: {0}", Location);
        }
    }
    
	// Child Constructor.
    // : is the way to implement inheritance in c# There are multiple scenarios that can use it. ( reuse, extend and modify )
    public class Details : LeagueOfLegendsCharacter {
        public int Health;
		public int Power;
		public int MovementSpeed;
		public int Armor;
		
        public void GetFightStats() {
            Console.WriteLine("Health: {0}", Health);
			Console.WriteLine("Power: {0}", Power);
			Console.WriteLine("Movement Speed: {0}", MovementSpeed);
			Console.WriteLine("Armor: {0}", Armor);
        }
    }

public class Program {
		// The Static means this Main is associated with Program class and 
	    // the Void means no return was given in this method.
        public static void Main(string[] args) {
			
			// This instantiates the child constructor.
            Details d = new Details();
			// Set Variables from the constructor.
            d.Name = "Ashe";
			d.Title = "The Frost Archer"; 
			d.Health = 539;
            d.Power = 61;
			d.MovementSpeed = 325;
			d.Armor = 26;
			
			// Sets champions location but also it will display the stats.
            d.GetLoLInfo("Freljord");
            d.GetFightStats();
        }
    }
}
