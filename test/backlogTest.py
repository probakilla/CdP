import unittest
from selenium import webdriver
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.keys import Keys


class BacklogProject(unittest.TestCase):
    WAIT = 10

    def test_chrome(self):
        chrome = webdriver.Remote(
            command_executor='http://127.0.0.1:4444/wd/hub',
            desired_capabilities=DesiredCapabilities.CHROME
        )
        self.backlog(chrome)
        chrome.quit()

    def backlog(self, browser):
        browser.get('http://php-apache:80')
        self.waitURL(browser, "HomePage")
        self.assertIn("HomePage", browser.current_url)

        link = browser.find_element_by_xpath("//a[@id='create-project']")
        link.click()
        self.waitURL(browser, "CreateProject")
        self.assertIn("CreateProject", browser.current_url)

        field = browser.find_element_by_xpath("//input[@name='projectName']")
        field.send_keys("projet_backlog_test")
        submit = browser.find_element_by_xpath("//input[@name='save']")
        submit.click()
        self.waitURL(browser, "Projects")
        self.assertIn("Projects", browser.current_url)

        listHref = browser.find_element_by_xpath("//a[@id='backlog-projet_backlog_test']")
        listHref.click()

    def waitURL(self, browser, content):
        wait = WebDriverWait(browser, self.WAIT)
        wait.until(EC.url_contains(content))


if __name__ == "__main__":
    unittest.main()
