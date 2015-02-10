import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
 
public class Test extends JFrame implements ActionListener {
public Test() {
    JButton jbtOK = new JButton("OK");
        add(jbtOK);
    }
 
    public void actionPerformed(ActionEvent e) {
        System.out.println("The OK button is clicked");
    }
 
    public static void main(String[ ] args) {
        JFrame frame = new Test();
        frame.setSize(300, 300);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setVisible(true);
    }
}