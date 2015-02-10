
public class A8dot1 {

	public static void main(String[] args) {
		/* This Assignment will call Rectangle.java */
			Rectangle rec = new Rectangle(4.0, 40.0);
			//rec.setWidth(4.0);
			//rec.setHeight(40.0);
			System.out.println("Rectangle 1");
			System.out.println("Perimeter of a Rectangle is : " + rec.getPerimeter());
			System.out.println("Area of a Rectangle is : " + rec.getArea());
	
			System.out.println("----------------------------------");
			
			Rectangle rec1 = new Rectangle(3.5, 35.9);
			//rec1.setWidth(3.5);
			//rec1.setHeight(35.9);
			System.out.println("Rectangle 2");
			System.out.println("Perimeter of a Rectangle is : " + rec1.getPerimeter());
			System.out.println("Area of a Rectangle is : " + rec1.getArea());
	}

}
