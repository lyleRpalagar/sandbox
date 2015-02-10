import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.border.Border;
import javax.swing.border.LineBorder;

import java.awt.Color;
import java.awt.GridLayout;
import java.awt.Font;

	public class A12dot8 extends JFrame {
	      public A12dot8(){
		/*(Swing common features) Display a frame that contains six labels. 
		 * Set the back- ground of the labels to white. 
		 * Set the foreground of the labels to black, blue, cyan, green
		 * magenta, and orange, respectively, as shown in Figure 12.28a  (page 477). 
		 * Set the border of each label to a line border with the color yellow. 
		 * Set the font of each label to Times Roman, bold, and 20 pixels. 
		 * Set the text and tool tip text of each label to the name of its 
		 * foreground color.*/
	    		setLayout(new GridLayout(2,3));
	    		
	    		/* Black 
	    		 * ******************/
	    		//Create the first Label 
	    			JLabel black = new JLabel("black");
	    		// Add Color
	    			black.setBackground(Color.WHITE);
	    			black.setForeground(Color.BLACK);
	    			// Create Font
	    				Font labelFont = new Font("TimesRoman", Font.BOLD, 20);
	    			// Add Font
	    				black.setFont(labelFont);
	    		// Add a tooltip
	    			black.setToolTipText("black");
	    			// Create a line border
	    				Border lineborder = new LineBorder(Color.YELLOW);
	    			// Add a Line Border
	    				black.setBorder(lineborder);
	    		// Add it to the frame
	    			add(black);
	            
	            /* Blue
	    		 * ******************/
	    		JLabel blue = new JLabel("blue");
	    		blue.setBackground(Color.WHITE);
    			blue.setForeground(Color.BLUE);
    			blue.setFont(labelFont);
    			blue.setToolTipText("blue");
    			blue.setBorder(lineborder);
	        	add(blue);
	        	
	        	 /* Cyan
	    		 * ******************/
	        	JLabel cyan = new JLabel("cyan");
	        	cyan.setBackground(Color.WHITE);
	        	cyan.setForeground(Color.CYAN);
    			cyan.setFont(labelFont);
    			cyan.setToolTipText("cyan");
    			cyan.setBorder(lineborder);
	        	add(cyan);
	        	
	        	 /* Green
	    		 * ******************/
	        	JLabel green = new JLabel("green");
	        	green.setBackground(Color.WHITE);
	        	green.setForeground(Color.GREEN);
	        	green.setFont(labelFont);
	        	green.setToolTipText("green");
	        	green.setBorder(lineborder);
	        	add(green);
	        	
	        	 /* Magenta
	    		 * ******************/
	        	JLabel magenta = new JLabel("magenta");
	        	magenta.setBackground(Color.WHITE);
	        	magenta.setForeground(Color.MAGENTA);
	        	magenta.setFont(labelFont);
	        	magenta.setToolTipText("magenta");
	        	magenta.setBorder(lineborder);
	        	add(magenta);
	        	
	        	/* Orange
	    		 * ******************/
	        	JLabel orange = new JLabel("orange");
	        	orange.setBackground(Color.WHITE);
	        	orange.setForeground(Color.ORANGE);
	        	orange.setFont(labelFont);
	        	orange.setToolTipText("orange");
	        	orange.setBorder(lineborder);
	        	add(orange);
	        	
	    		

	    	  
	}


	      
	      
public static void main(String[] args) {
	A12dot8 frame = new A12dot8();
	frame.setTitle("Excerise12_3");
	frame.setSize(500, 500);
	frame.setLocationRelativeTo(null);
	frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	frame.setVisible(true);
   }
	
}
