import java.awt.*;
import javax.swing.*;

public class A13dot15 extends JFrame{	
	public static void main(String[] args) {
		
		JFrame f = new JFrame("A13dot15 PieChart");
		ArcsPanel pieChart = new ArcsPanel();
		
		f.add(pieChart);
	 
		f.setSize(600, 400);
		f.setLocationRelativeTo(null); // Center the frame
		f.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		f.setVisible(true);

	}
}

// The class for drawing arcs on a panel
class ArcsPanel extends JPanel{
	@Override // Draw four blades of a fan
	  protected void paintComponent(Graphics g){
		super.paintComponent(g);
		
		// over all pie
		g.setFont(new Font("SansSerif", Font.BOLD, 20));
		
		
		
// 1st slice
		g.setColor(Color.RED);
		g.fillArc(160, 45, 275, 275, 0, 72); /* 20%*/
  //text
		g.setColor(Color.BLACK);
		g.drawString("Projects -- 20%", 425, 125);
		
// 2nd slice
				g.setColor(Color.BLUE);
				g.fillArc(160, 45, 275, 275, 72, 36); /* 10%*/
//text
				g.setColor(Color.BLACK);
				g.drawString("Quizzes -- 10%", 150, 35);

// 3nd slice
				g.setColor(Color.GREEN);
				g.fillArc(160, 45, 275, 275, 108,108 ); /* 30%*/
//text
				g.setColor(Color.BLACK);
				g.drawString("Midterms -- 30%", 5, 108);	
				
// 4nd slice
				g.setColor(Color.ORANGE);
				g.fillArc(160, 45, 275, 275, 0,-144 ); /* 40%*/
//text
				g.setColor(Color.BLACK);
				g.drawString("Final -- 30%", 420, 260);
		
		
		
		
		
	}
	

}
