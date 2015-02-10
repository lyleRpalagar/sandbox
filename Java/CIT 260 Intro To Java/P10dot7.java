import java.util.Scanner;

public class P10dot7 {

	static Scanner input;
	
	public static void main(String[] args) {
		Account[] accounts = new Account[10];
		for (int i = 0; i < accounts.length; i++) {
			accounts[i] = new Account(i, 100.0);
		}
		int id = 0;
		input = new Scanner(System.in);
		do {
			System.out.print("Enter an id between 0 and 9 or -1 to exit: ");
			id = input.nextInt();
			if (id >= 0 && id < accounts.length)
				drawMenu(accounts[id]);
			else if (id != -1)
				System.out.println("Please enter a valid id");
		} while (id >= 0);
	}

	private static void drawMenu(Account account) {
		int choice;
		do {
			System.out.println("Main menu");
			System.out.println("1: check balance");
			System.out.println("2: withdraw");
			System.out.println("3: deposit");
			System.out.println("4: exit");
			System.out.print("Enter a choice: ");
			choice = input.nextInt();
			double amount;
			switch (choice) {
				case 1 : System.out.printf("The balance = %10.2f\n", account.getBalance());
						 break;
				case 2 : System.out.print("Enter an amount to withdraw: ");
						 amount = input.nextDouble();
						 account.withdraw(amount);
						 break;
				case 3 : System.out.print("Enter an amount to deposit: ");
						 amount = input.nextDouble();
						 account.deposit(amount);
						 break;
				case 4 : break;
				default: System.out.println("invalid option");
			}
		} while (choice != 4);
	}
}
