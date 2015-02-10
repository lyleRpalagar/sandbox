import java.util.Scanner;


public class A11dot1 {

	public static void main(String[] args) {
	
		Triangle t = new Triangle();
		
		Scanner input = new Scanner(System.in);
		System.out.print("What do you want Side 1 to be?: ");
		double side1 = input.nextDouble();
		
		System.out.println("Side 2 to be?: ");
		double side2 = input.nextDouble();
		
		System.out.println("Side 3 to be?: ");
		double side3 = input.nextDouble();
		
		System.out.println("What do you want the color of the Triangle to be?: ");
		 String color = input.next();
		 t.setColor(color);
		 System.out.println("Is this triangle filled[ true / false ]: ");
		boolean filled = input.nextBoolean();
		 t.setFilled(filled);
		 
		System.out.println("Perimeter of a Triangle is " + t.getArea() +
				           " \nArea of a Triangle is " + t.getPerimeter() +
				           " \nThe Triangle is " + t.getColor() +
				           " \nThe Triangle is filled: " + t.isFilled());
        
	}


}
