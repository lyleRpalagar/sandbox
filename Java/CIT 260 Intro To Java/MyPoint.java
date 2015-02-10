
/* A method named distance that returns the distance from this point to another point of the MyPoint type.
   A method named distance that returns the distance from this point to another point with specified x- and y-coordinates.
   Draw the UML diagram for the class and then implement the class.
   Write a test program that creates the two points (0, 0) and (10, 30.5) and displays the distance between them.
 */
public class MyPoint {
	  private double x = 0;
	  private double y = 0;
     
	  // No arg - construtor 
	  MyPoint(){
	  }
	  
	  // Creates a constructor that constructs a point with specified coordinates
	  MyPoint(double x, double y){
		  this.x = x;
		  this.y = y;
	  }
	  
	public double getX(){
		  return x;
	  }
	  
	public double getY(){
		  return y;
	  }
	  
	public double setX(){
		 return x;
	 }
	 
	public double setY(){
		 return y;
	 }
	 
	
	// method that returns the distance from this point to another point 
	// the declaration states that Grab the point the user has inputed
	// This method will grab the users point and the default point and find the distance between them.
	public double distance(MyPoint other){
		return Math.sqrt( Math.pow(this.x - other.getX(),2) + Math.pow(this.y - other.getY(),2));
		
	}
	
	// method that returns the distance from this point to another point 
	// this method is used to grab the users point and the get point that you set
	// and find the distance.
	public double distance(double x, double y){
	    return Math.sqrt( Math.pow(this.x - x, 2) + Math.pow(this.y -y, 2));
	}
	 
	 
}