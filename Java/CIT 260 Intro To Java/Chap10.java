/**
 * 
 */
//package unitTests;

import static org.junit.Assert.*;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

/**
 * @author Casey Moffett
 * @Date Oct 23, 2013
 * @CopyWrite 2013
 * @Version 1.0
 * 
 */
public class Chap10 {
	private int errors = 0;

	MyPoint[] aPoint = new MyPoint[3];

	/**
	 * @throws java.lang.Exception
	 */
	@Before
	public void setUp() throws Exception {
		aPoint[0] = new MyPoint();
		aPoint[1] = new MyPoint(10, 30.5);
		// for (int i = 2; i < aPoint.length; i++) {
		// aPoint[i] = new MyPoint(i, (i * 2));
		// }

	}

	/**
	 * Test method for {@link unitTests.MyPoint#MyPoint()}.
	 */
	@Test
	public void testMyPoint() {
		double delta = 0.0001;
		try {
			assertEquals(0, aPoint[0].getX(), delta);
			assertEquals(0, aPoint[0].getY(), delta);
		} catch (Exception e) {
			System.err.println(e.toString());
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}

	}

	/**
	 * Test method for {@link unitTests.MyPoint#MyPoint(double, double)}.
	 */
	@Test
	public void testMyPointDoubleDouble() {
		double delta = 0.01;
		try {
			assertEquals(10, aPoint[1].getX(), delta);
			assertEquals(30.5, aPoint[1].getY(), delta);
		} catch (Exception e) {
			System.err.println(e.toString());
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}
	}

	/**
	 * Test method for {@link unitTests.MyPoint#distance(unitTests.MyPoint)}.
	 */
	@Test
	public void testDistanceMyPoint() {
		try {
			double delta = 0.001;
			assertEquals(32.097, aPoint[0].distance(aPoint[1]), delta);
		} catch (Exception e) {
			System.err.println(e.toString());
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}
	}

	/**
	 * Test method for {@link unitTests.MyPoint#distance(double, double)}.
	 */
	@Test
	public void testDistanceDoubleDouble() {
		MyPoint p = new MyPoint();
		MyPoint b = new MyPoint(25, 15);
		double delta = 0.0001;
		try {
			assertEquals(29.1547, p.distance(b), delta);
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
