import java.awt.*;
import java.awt.event.*;

import javax.swing.*;


public class A17dot3 extends JFrame {
	// Creating instance variable
	JRadioButton jrbRed;
	JRadioButton jrbYellow;
	JRadioButton jrbGreen;
	Light light;
	
	public A17dot3(){
		 setTitle("Traffic Light");
		    
		// Create panel to draw 
		 	JPanel p1 = new JPanel();
		 	p1.setLayout(new FlowLayout());
		 	// create the light and add it to the panel
		 	light = new Light();
		 	p1.add(light);
		 	
		// Create panel for GUI
		 	JPanel p2 = new JPanel();
		 	p2.setLayout(new FlowLayout());
		 
		 // Create radio buttons
		 	jrbRed = new JRadioButton("Red");
		 	jrbYellow = new JRadioButton("Yellow");
		 	jrbGreen = new JRadioButton("Green");
		 
		 // add radio button to p2 panel
		 	p2.add(jrbRed);
		 	p2.add(jrbYellow);
		 	p2.add(jrbGreen);
		 	
		 // Must create button group if you are using radio button
		 	ButtonGroup btg = new ButtonGroup();
		 	btg.add(jrbRed);
		 	btg.add(jrbYellow);
		 	btg.add(jrbGreen);
		 	
		 // Add keyboard Mnemonic (keyboard shortcuts) mac: ctrl + alt [ set keyboard ]. win: alt [ set keyboard ]
	        jrbRed.setMnemonic('R');
	        jrbYellow.setMnemonic('Y');
	        jrbGreen.setMnemonic('G');
	        
		// Setting location of the panels
		 	add(p1, BorderLayout.CENTER);
		 	add(p2, BorderLayout.SOUTH);
		 	
		 // Create the listener
		 	ListenerClass listener = new ListenerClass();
		 	jrbRed.addItemListener(listener);
		 	jrbYellow.addItemListener(listener);
		 	jrbGreen.addItemListener(listener);
		 // setting size of the window and close option
		 	setSize(250, 170);
		 	setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		 //center window
		 	setLocationRelativeTo(null);
		 	setVisible(true);
		 	
		 	
		 	
	}
	public static void main(String[] args) {
			new A17dot3();
      
	}
	
	private class Light extends JPanel{
		boolean red, yellow, green;
		
		// Set a constructor for light to show
		public Light(){
			setPreferredSize(new Dimension(40, 90));
		}
		
		// extends to the listener class when user clicks on red turn red to true and everything false and so on so forth.
		public void turnOnRed(){
			red = true;
			yellow = false;
			green = false;
			repaint();
		}
		public void turnOnYellow(){
			red = false;
			yellow = true;
			green = false;
			repaint();
		}
		public void turnOnGreen(){
			red = false;
			yellow = false;
			green = true;
			repaint();
		}
		
		// end of listener 
		
		protected void paintComponent(Graphics g){
			super.paintComponent(g);
			
			;
			
			// colors the turnOn what ever is active
			if(red){
				g.setColor(Color.RED);
				g.fillOval(10,10,20,20);	
			}
			if(yellow){
				g.setColor(Color.YELLOW);
				g.fillOval(10,35,20,20);	
			}
			if(green){
				g.setColor(Color.GREEN);
				g.fillOval(10,60,20,20);	
			}
			
			//Drawing the rectangle
			g.setColor(Color.BLACK);
			g.drawRect(5,5,30,80);
			// Drawing ovals for the light colors
			g.drawOval(10,10,20,20);
			g.drawOval(10,35,20,20);
			g.drawOval(10,60,20,20);
		}
	}
	
	//Create a listener
	
	private class ListenerClass implements ItemListener{
		public void itemStateChanged(ItemEvent e){
			if(jrbRed.isSelected()){
				light.turnOnRed();
			}
			if(jrbYellow.isSelected()){
				light.turnOnYellow();
			}
			if(jrbGreen.isSelected()){
				light.turnOnGreen();
			}
		}
	}

}
