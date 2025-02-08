package cal;
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class Calculator implements ActionListener {

	JFrame frame;
	JTextField field;
	JButton[] numberbuttons = new JButton[10];
	JButton[] functionbuttons = new JButton[8];
	JButton add,sub,mul,div;
	JButton dec,equal,del,clr;
	JPanel panel;
	char operator;
	
	Font myfont = new Font("Ink Free",Font.BOLD,30);
	
	double num1=0,num2=0,result=0;
	
	Calculator(){
		
		frame = new JFrame("Calculator");
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setSize(420,550);
		frame.setLayout(null);
		frame.setLocationRelativeTo(null);
		
		field = new JTextField();
		field.setBounds(50,25,300,50);
		field.setFont(myfont);
		field.setEditable(false);
		
		add = new JButton("+");
		sub = new JButton("-");
		mul = new JButton("*");
		div = new JButton("/");
		dec = new JButton(".");
		equal = new JButton("=");
		del = new JButton("Del");
		clr = new JButton("Clr");
		
		functionbuttons[0] = add;
		functionbuttons[1] = sub;
		functionbuttons[2] = mul;
		functionbuttons[3] = div;
		functionbuttons[4] = dec;
		functionbuttons[5] = equal;
		functionbuttons[6] = del;
		functionbuttons[7] = clr;
		
		
		for(int i =0;i<8;i++) {
			functionbuttons[i].addActionListener(this);
			functionbuttons[i].setFont(myfont);
			functionbuttons[i].setFocusable(false);
		}
		
		for(int i =0;i<10;i++) {
			numberbuttons[i] = new JButton(String.valueOf(i));
			numberbuttons[i].addActionListener(this);
			numberbuttons[i].setFont(myfont);
			numberbuttons[i].setFocusable(false);
			
		}
		del.setBounds(50,430,145,50);
		clr.setBounds(205,430,145,50);
		
		panel = new JPanel();
		panel.setBounds(50,100,300,300);
		panel.setLayout(new GridLayout(4,4,10,10));
		
		panel.add(numberbuttons[1]);
		panel.add(numberbuttons[2]);
		panel.add(numberbuttons[3]);
		panel.add(add);
		panel.add(numberbuttons[4]);
		panel.add(numberbuttons[5]);
		panel.add(numberbuttons[6]);
		panel.add(sub);
		panel.add(numberbuttons[7]);
		panel.add(numberbuttons[8]);
		panel.add(numberbuttons[9]);
		panel.add(mul);
		panel.add(dec);
		panel.add(numberbuttons[0]);
		panel.add(equal);
		panel.add(div);
	
		frame.add(panel);
		frame.add(del);
		frame.add(clr);
		frame.add(field);
		frame.setVisible(true);
	}
	public static void main(String[] args) {

			Calculator calculator = new Calculator();
	}

	@Override
	public void actionPerformed(ActionEvent e) {
	
		for(int i =0;i<10;i++) {
			if(e.getSource() == numberbuttons[i]) {
				field.setText(field.getText().concat(String.valueOf(i)));
			}
		}
			if(e.getSource() == dec) {
				field.setText(field.getText().concat(String.valueOf(".")));
				
			} 
			if(e.getSource() == add) {
				num1 = Double.parseDouble(field.getText());
				operator = '+';
				field.setText("");
			}
			if(e.getSource() == sub) {
				num1 = Double.parseDouble(field.getText());
				operator = '-';
				field.setText("");
			}
			if(e.getSource() == mul) {
				num1 = Double.parseDouble(field.getText());
				operator = '*';
				field.setText("");
			}
			if(e.getSource() == div) {
				num1 = Double.parseDouble(field.getText());
				operator = '/';
				field.setText("");
			}
			if(e.getSource() == equal) {
				num2 = Double.parseDouble(field.getText());
				
				switch(operator) {
				case '+':
					result=num1+num2;
					break;
				case '-':
					result=num1-num2;
					break;
				case '*':
					result=num1*num2;
					break;
				case '/':
					result=num1/num2;
					break;
				
				
				}
				field.setText(String.valueOf(result));
				num1=result;
			}
			if(e.getSource() == clr) {
				field.setText("");
			}
			if(e.getSource() == del) {
				String string = field.getText();
				field.setText("");
				for(int i = 0;i<string.length()-1;i++) {
					field.setText(field.getText()+string.charAt(i));
				}
				
				}

			
	}

}
