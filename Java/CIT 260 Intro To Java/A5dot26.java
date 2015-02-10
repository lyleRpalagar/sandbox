
public class A5dot26 {

	public static void main(String[] args) {
		for(int count = 0, number = 2; count < 100; number++){
			if(isPrime(number) && isPal(number)){
			  System.out.printf("%7d", number);
			  count++;
			  if(count % 10 == 0){
				  System.out.println();
			  }
			}
		}
	}//main

	private static boolean isPal(int number) {
		String numStr = "" + number;
		for(int left = 0 , right = numStr.length() - 1; left < right; left++, right--){
			if(numStr.charAt(left) != numStr.charAt(right)){
				return false;
			}
		}
		return true;
	}//method

	private static boolean isPrime(int number) {
		
		double last = Math.sqrt(number);
		for(int i = 2; i <= last; i ++){
			if(number % i == 0){
				return false;
			}
		}
		return true;
	}//method

}// class
