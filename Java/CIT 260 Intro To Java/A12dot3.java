import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import java.awt.GridLayout;

public class A12dot3 extends JFrame {
      public A12dot3(){
    	setLayout(new GridLayout(2,3));
    	
    	for(int i = 1; i <= 6; i++){
    		add(new JButton("Button"+ i ));
    	}
    	
      }

	public static void main(String[] args) {
		A12dot3 frame = new A12dot3();
		frame.setTitle("Excerise12_3");
		frame.setSize(250, 200);
		frame.setLocationRelativeTo(null);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setVisible(true);
	}
		
	}