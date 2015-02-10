//package unitTests;

import static org.junit.Assert.*;

import java.util.Date;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

//import unitTestsFiles.Triangle;

/**
 * @author Casey Moffett
 * @Date Nov 06, 2013
 * @CopyWrite 2013
 * @Version 1.0
 */

public class Chap11 {
	// the number of errors that were found during the test
	private int errors = 0;
	// the array of traingles to be tested
	Triangle[] testTri = new Triangle[100];
	// The limit of allowed error
	double delta = 0.005;

	public static double correctArea(double s1, double s2, double s3) {
		double p = ((s1 + s2 + s3) / 2);
		return Math.sqrt(p * (p - s1) * (p - s2) * (p - s3));
	}

	@Before
	public void setUp() throws Exception {
		// Area is 92.64
		testTri[0] = new Triangle(14, 14, 22.8);
		// Area is 1.5
		testTri[1] = new Triangle();
		// Area is 131.14
		testTri[2] = new Triangle(20, 20, 14);
		for (int i = 3; i < testTri.length; i++) {
			testTri[i] = new Triangle(i, (i - 1), (i * .5));
		}
	}

	@Test
	public void testToString() {
		// System.out.println(testTri[1].toString());
		try {
			assertTrue(
					"toString Out of range for default Triangle",
					testTri[1].toString().equals(
							"Triangle: side1 = 1.0 side2 = 1.0 side3 = 1.0"));
			for (int j = 0; j < testTri.length; j++) {
				assertTrue(
						"toString Pattern Does Not Match " + j,
						testTri[j]
								.toString()
								.matches(
										"^Triangle:\\sside1\\s=\\s[0-9]*.?[0-9]*\\sside2\\s=\\s[0-9]*.?[0-9]\\sside3\\s=\\s[0-9]*.?[0-9]$"));
			}
		} catch (Exception e) {
			System.err.println(e.toString());
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}

	}

	@Test
	public void testGetArea() {

		try {
			assertEquals("Get area returned wrong Value for testTri[0]", 92.64,
					testTri[0].getArea(), delta);
			assertEquals("Get area returned wrong Value for testTri[2]",
					131.14, testTri[2].getArea(), delta);
			for (int i = 0; i < testTri.length; i++) {
				assertEquals(
						"Get area returned wrong Value for testTri[" + i + "]",
						correctArea(testTri[i].getSide1(),
								testTri[i].getSide2(), testTri[i].getSide3()),
						testTri[i].getArea(), delta);
			}
		} catch (Exception e) {
			System.err.println(e.toString());
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}
	}

	@Test
	public void testGetPerimeter() {
		try {
			assertEquals(
					"Get Perimiter returned incorrect Value for Default Triangel",
					3, testTri[1].getPerimeter(), delta);
			for (int i = 0; i < testTri.length; i++) {
				assertEquals(
						"getPerimeter Failed for testTri[" + i + "]",
						(testTri[i].getSide1() + testTri[i].getSide2() + testTri[i]
								.getSide3()), testTri[i].getPerimeter(), delta);
			}
		} catch (Exception e) {
			System.err.println(e.toString());
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}
	}

	@Test
	public void getDateCreated() {
		try {
			for (int i = 0; i < testTri.length; i++) {
				assertEquals(
						"Get Date Created Failed to return appropriat timestamp for testTri["
								+ i + "]", new Date().getTime(), testTri[1]
								.getDateCreated().getTime(), 1000);
			}
		} catch (Exception e) {
			System.err.println(e.toString());
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}
	}

	@Test
	public void getColor() {
		try {
			assertEquals("getColor failed to return correctly for testTri[1]",
					"white", testTri[1].getColor());
			testTri[34].setColor("Red");
			assertEquals("getColor failed to return correctly for testTri[34]",
					"Red", testTri[34].getColor());
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
