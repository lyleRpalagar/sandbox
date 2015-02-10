import java.util.Date;
public class A8dot3 {
		// Date(elapseTime : dataType Long)
	
		  public static void main(String[] args) {
			  // creates a date object
			  // elapse 10000
		    Date date1 = new Date (10000L);;
		    System.out.println(date1.toString() );
		    
		    Date date1a = new Date (100000L);
		    System.out.println(date1a.toString() );
		    
		    Date date2 = new Date (1000000L);
		    System.out.println(date2.toString() );
		    
		    Date date3 = new Date (10000000L);
		    System.out.println(date3.toString() );
		    
		    Date date4 = new Date (10000000L);
		    System.out.println(date4.toString() );
		    
		    Date date5 = new Date (1000000000L);
		    System.out.println(date5.toString() );
		    
		    Date date6 = new Date (10000000000L);
		    System.out.println(date6.toString() );
		    
		    Date date7 = new Date (100000000000L);
		    System.out.println(date7.toString() );
		  }
	}

