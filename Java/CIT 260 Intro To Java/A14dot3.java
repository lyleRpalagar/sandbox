import java.util.*;



public class A14dot3{

	public static void main(String[] args)  {
		

		boolean bool = true;

		//Generate array with 100 randomly chosen integers
		int [] rand = new int [100];

		for(int i = 0; i < rand.length; i++)
		rand[i] =
		(int)(Math.random()*Integer.MAX_VALUE);

		//Enter the index of the Array, then display the element

		Scanner input = new Scanner(System.in);
		System.out.print("Enter an index array: ");
		
		while(bool){
			try{
				System.out.println(rand[input.nextInt()]);
				bool = false;
			}
			catch(ArrayIndexOutOfBoundsException ex){
				System.out.println("*** Out of Bounds Please try again ***");
				System.out.println();
				System.out.print("Enter an index array: ");
				input.nextLine();
			}
		
		}	
	}

}
