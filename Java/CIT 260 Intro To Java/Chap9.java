//package unitTests;

import static org.junit.Assert.*;

import org.junit.After;
import org.junit.Test;

//import unitTestsFiles.A9dot11;
//import unitTestsFiles.A9dot5;

public class Chap9 {

	// the number of errors that were found during the test
	private int errors = 0;

	/**
	 * Test A9dot5
	 */
	@Test
	public void test() {
		try {
			int[] a = { 1, 1, 0, 0, 0, 1, 3, 1, 2, 1 };
			assertArrayEquals(a, A9dot5.count("0198576668Fam"));
			int[] b = { 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 };
			assertArrayEquals(b, A9dot5.count("0123456789"));
			int[] c = { 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 };
			assertArrayEquals(c, A9dot5.count("Hello World"));
		} catch (Exception e) {
			System.err.println(e.toString());
			errors++;
		} catch (AssertionError e) {
			System.err.println(e.getMessage());
			errors++;
		}

	}

	@Test
	public void test2() {
		try {
			assertEquals("abcdefg", A9dot11.sort("gfedcba"));
			assertEquals("adgjl", A9dot11.sort("ldjag"));
			assertEquals("eqrtwy", A9dot11.sort("qwerty"));
			assertEquals("Zbtv", A9dot11.sort("bvtZ"));
		} catch (Exception e) {
			System.err.println(e.toString());
			errors++;
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
