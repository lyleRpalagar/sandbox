import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

//This program will create a loan calculator. yep pretty cool!

@SuppressWarnings("serial")
public class A16dot4 extends JFrame {
	
	//declare textfields and buttons
	private JTextField jtfNumber1;
	private JTextField jtfNumber2;
	private JTextField jtfResult;
	
	
	private JButton jbtAdd;
	private JButton jbtSubtract;
	private JButton jbtMultiply;
	private JButton jbtDivide;
	
	public A16dot4() {
		
		JFrame f= new JFrame("Exercise 16 dot 4");
		f.setLayout(new FlowLayout());
		
		JPanel p1 = new JPanel();
		JPanel p2 = new JPanel();
		p1.setLayout(new FlowLayout());
		p2.setLayout(new FlowLayout());
		
		// common GUI setup
		setTitle("Calculator");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(450, 100);
		setLocationRelativeTo(null);
		setLayout(new FlowLayout());
		
	
		// create JLabels
		JLabel jlNumber1 = new JLabel(" Number 1");
		JLabel jlNumber2 = new JLabel(" Number 2");
		JLabel jlResult = new JLabel(" Result");
		
		
		// create the JTextFields
		jtfNumber1 = new JTextField();
		jtfNumber2 = new JTextField();
		jtfResult = new JTextField();

		//set the text field only to output!!! cool
		jtfResult.setEditable(false);
		
		jtfNumber1.setPreferredSize(new Dimension(60,22));
		jtfNumber2.setPreferredSize(new Dimension(60,22));
		jtfResult.setPreferredSize(new Dimension(100,22));
		
		// create JButtons
		jbtAdd = new JButton("Add");
		jbtSubtract = new JButton("Subtract");
		jbtMultiply = new JButton("Multiply");
		jbtDivide = new JButton("Divide");
		
		// add JLabels to frame
		add(jlNumber1);
		add(jtfNumber1);
		add(jlNumber2);
		add(jtfNumber2);
		add(jlResult);
		add(jtfResult);
		add(jbtAdd);
		add(jbtSubtract);
		add(jbtMultiply);
		add(jbtDivide);
		
		//create listener class and associate with button
		ListenerClass listener = new ListenerClass();
		jbtAdd.addActionListener(listener);
		jbtSubtract.addActionListener(listener);
		jbtMultiply.addActionListener(listener);
		jbtDivide.addActionListener(listener);
		
		// set at end!!!
		setVisible(true);
	}

	public static void main(String[] args) {
		
	//Creates a look and feel
	try {
		UIManager.setLookAndFeel("javax.swing.plaf.nimbus.NimbusLookAndFeel");
	} catch (Exception e) {
		System.out.println("Look and feel error");
	}
	
		new A16dot4();
	}
	
	private void addValue() {
		
		try {
			
			double Number1 = Double.parseDouble(jtfNumber1.getText());
			double Number2 = Double.parseDouble(jtfNumber2.getText());
			double Result = Number1 + Number2;
			jtfResult.setText(String.format("%.2f", Result));
			
			
		} catch (Exception e) {
			JOptionPane.showMessageDialog(null," Please enter numberic values.");
		}
		
	}
	
	private void subValue() {
		
		try {
			
			double Number1 = Double.parseDouble(jtfNumber1.getText());
			double Number2 = Double.parseDouble(jtfNumber2.getText());
			double Result = Number1 - Number2;
			jtfResult.setText(String.format("%.2f", Result));
			
			
		} catch (Exception e) {
			JOptionPane.showMessageDialog(null," Please enter numberic values.");
		}
		
	}
	
private void mulValue() {
		
		try {
			
			double Number1 = Double.parseDouble(jtfNumber1.getText());
			double Number2 = Double.parseDouble(jtfNumber2.getText());
			double Result = Number1 * Number2;
			jtfResult.setText(String.format("%.2f", Result));
			
			
		} catch (Exception e) {
			JOptionPane.showMessageDialog(null," Please enter numberic values.");
		}
		
	}

private void divValue() {
	
	try {
		
		double Number1 = Double.parseDouble(jtfNumber1.getText());
		double Number2 = Double.parseDouble(jtfNumber2.getText());
		double Result = Number1 / Number2;
		jtfResult.setText(String.format("%.2f", Result));
		
		
	} catch (Exception e) {
		JOptionPane.showMessageDialog(null," Please enter numberic values.");
	}
	
}
	

	private class ListenerClass implements ActionListener {
		public void actionPerformed(ActionEvent e) {
			if (e.getSource() == jbtAdd) {
				addValue();
			}
			if (e.getSource() == jbtSubtract) {
				subValue();
			}
			if (e.getSource() == jbtMultiply) {
				mulValue();
			}
			if (e.getSource() == jbtDivide) {
				divValue();
			}
		}
	}
}