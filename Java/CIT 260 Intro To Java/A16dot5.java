import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

//This program will create a loan calculator. yep pretty cool!

@SuppressWarnings("serial")
public class A16dot5 extends JFrame {
	
	//declare textfields and buttons
	private JTextField jtfInvestmentAmount;
	private JTextField jtfNumberOfYears;
	private JTextField jtfAnnualInterestRate;
	private JTextField jtfFutureValue;
	
	private JButton jbtCompute;
	private JButton jbtReset;
	
	public A16dot5() {
		
		JFrame f= new JFrame("Exercise 12 dot 1");
		f.setLayout(new FlowLayout());
		
		JPanel p1 = new JPanel();
		JPanel p2 = new JPanel();
		p1.setLayout(new FlowLayout());
		p2.setLayout(new FlowLayout());
		
		// common GUI setup
		setTitle("Loan Calculator");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(500, 300);
		setLocationRelativeTo(null);
		setLayout(new GridLayout(5, 2, 5, 5));
		
		// create JLabels
		JLabel jlInvestmentAmount = new JLabel(" Investment Amount");
		JLabel jlNumberOfYears = new JLabel(" Number Of Years");
		JLabel jlAnnualInterestRate = new JLabel(" Annual Interest Rate");
		JLabel jlFutureValue = new JLabel(" Future Value");
		
		// create the JTextFields
		jtfInvestmentAmount = new JTextField();
		jtfNumberOfYears = new JTextField();
		jtfAnnualInterestRate = new JTextField();
		jtfFutureValue = new JTextField();
		//set the text field only to output!!! cool
		jtfFutureValue.setEditable(false);
		
		// create JButtons
		jbtCompute = new JButton("Compute");
		jbtReset = new JButton("Reset");
		
		// add JLabels to frame
		add(jlInvestmentAmount);
		add(jtfInvestmentAmount);
		add(jlNumberOfYears);
		add(jtfNumberOfYears);
		add(jlAnnualInterestRate);
		add(jtfAnnualInterestRate);
		add(jlFutureValue);
		add(jtfFutureValue);
		add(jbtCompute);
		add(jbtReset);
		
		//create listener class and associate with button
		ListenerClass listener = new ListenerClass();
		jbtCompute.addActionListener(listener);
		jbtReset.addActionListener(listener);
		
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
	
		new A16dot5();
	}
	
	private void computeValue() {
		
		try {
			
			double annualInterestRate = Double.parseDouble(jtfAnnualInterestRate.getText());
			double monthlyInterestRate = annualInterestRate / 1200.0;
			double investmentAmount = Double.parseDouble(jtfInvestmentAmount.getText());
			double years = Integer.parseInt(jtfNumberOfYears.getText());
			double futureValue = investmentAmount * Math.pow(1.0 + monthlyInterestRate, years * 12);
			jtfFutureValue.setText(String.format("%.2f", futureValue));
			
			
		} catch (Exception e) {
			JOptionPane.showMessageDialog(null," Please enter numberic values.");
		}
		
	}
	
	private void resetForm() {
		
		jtfAnnualInterestRate.setText("");
		jtfInvestmentAmount.setText("");
		jtfNumberOfYears.setText("");
		jtfFutureValue.setText("");
		
	}
	
	private class ListenerClass implements ActionListener {
		public void actionPerformed(ActionEvent e) {
			if (e.getSource() == jbtCompute) {
				computeValue();
			}
			if (e.getSource() == jbtReset) {
				resetForm();
			}
		}
	}
}