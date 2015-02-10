
public class Rectangle {
	// setting width and area for the rectangle
    private double width = 1.0;
    private double height = 1.0;
    
    Rectangle(){
    }
  /* Creates a no arg Constructor that creates a default rectangle */
    Rectangle(double newWidth, double newHeight){
     	width = newWidth;
    	height = newHeight;
    }
    
    /* Returns area of the rectangle */
    double getArea(){
    	return width * height;
    }
    
    /* Returns perimeter of the rectangle */
    double getPerimeter(){
    	return 2 * (width + height);
    }
    
    /* set width and height */
    /* the user will now have access to these two variables */
    
    double setWidth(double newWidth){
        return width = newWidth;
         
    }
    double setHeight(double newHeight){
    	return height = newHeight;
    }
}
