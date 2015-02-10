//package unitTests;

import static org.junit.Assert.*;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

//import unitTestsFiles.Rectangle;



public class Ch8dot1Test {
	// the number of errors that were found during the test
	private int errors = 0;
	Rectangle[] testCases = new Rectangle[20];

	@Before
	public void setup() {
		Rectangle rect1 = new Rectangle(4, 40);
		testCases[0] = rect1;
		Rectangle rect2 = new Rectangle(3.5, 35.9);
		testCases[1] = rect2;
		for (int i = 2; i < testCases.length; i++) {
			Rectangle rect = new Rectangle(i, (i * i));
			testCases[i] = rect;
		}
	}

	@Test
	public void testSetArea() {
		try {
			assertEquals(160.0, testCases[0].getArea(), 0.0001);
			assertEquals(125.649, testCases[1].getArea(), 0.001);
		} catch (Exception e) {
			System.err.println(e.toString());
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}
	}

	@Test
	public void testSetPerimeter() {
		try {
			assertEquals(88.0, testCases[0].getPerimeter(), 0.0001);
			assertEquals(78.8, testCases[1].getPerimeter(), 0.0001);
		} catch (Exception e) {
			System.err.println(e.toString());
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}
	}

	@Test
	public void testLoop() {
		try {
			for (int i = 2; i < testCases.length; i++) {
				double a = (i * (i * i));
				double b = ((i * 2) + (2 * (i * i)));
				assertEquals(a, testCases[i].getArea(), 0.01);
				assertEquals(b, testCases[i].getPerimeter(), 0.01);
			}
		} catch (Exception e) {
			System.err.println(e.toString());
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}
	}
	
	@After
	public void cleanUp() {
		assertEquals("Opps somewhere you failed a test", 0, errors);
	}

}
